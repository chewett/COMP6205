<?php

$pageRequiresLogin = true;
require_once "inc/setup.php";

if(!(isset($_GET['id']) && (int)$_GET['id'])) {
	die();
}

/** @var Bankaccount $bankAccount */
$bankAccount = $em->getRepository("Bankaccount")->find((int)$_GET['id']);

if(!isset($_GET['month']) || (int)$_GET['month'] == 0 || !isset($_GET['year']) || (int)$_GET['year'] == 0)  {
	die();
}

$month = (int)$_GET['month'];
$year = (int)$_GET['year'];

$newPeriod = determineStartOfNextMonth($month, $year);
$pastMonth = determineStartOfPreviousMonth($month, $year);

$qb = $em->createQueryBuilder();
$qb->select("t")
	->from("Transaction", "t")
	->where("(t.idBankaccountFrom = ?1 OR t.idBankaccountTo = ?1) AND (t.time >= ?2 AND t.time < ?3)")
	->setParameter(1, $bankAccount->getIdBankaccount())
	->setParameter(2, $year . '-' . $month .'-01')
	->SetParameter(3, $newPeriod[1] .'-' . $newPeriod[0] . '-01');
$query = $qb->getQuery();
/** @var Transaction[] $allTransactions */
$allTransactions = $query->getResult();


$statement =
'
\documentclass[12pt,a4paper]{article}

\usepackage{times}
\usepackage{mdwlist} %used for itemize* for more compact lists
	\usepackage{graphicx} %allows lots of nice figures and shizz
	\usepackage{amsmath} %allows some nicer mathmatical stuff
	\usepackage{amssymb} %allows for set display with \mathbb{}
\usepackage{geometry}
\usepackage{fixltx2e} %subscripts using \textsubscript
	\usepackage{alltt} % alltt enviroment to do verbatin + math stuff
	\usepackage[UKenglish]{babel}% http://ctan.org/pkg/babel
\usepackage[UKenglish]{isodate}% http://ctan.org/pkg/isodate
\usepackage{fancyhdr} % for headers and footers
	\usepackage{rotating}
\usepackage{hyperref}
\usepackage[round]{natbib}

\title{Statement}
\begin{document}

% headers
	\fancyhead[L]{Account statement}
\fancyhead[C]{Our Bank}
\fancyhead[R]{Printed \today}

% need to specify the pagestyle as fancy
	\pagestyle{fancy}


Account ID: '. $bankAccount->getIdBankaccount().'

Account Name: '.$bankAccount->getName().'

Account Type: '.$bankAccount->getIdAccounttype()->getName().' \newline

\begin{tabular}{|c|c|c|c|}
\hline
Date & Reference & Spent & Received \\\\
\hline';


foreach($allTransactions as $transaction) {
	if ($transaction->getIdBankaccountTo() === $bankAccount) {
		$received = '\pounds'. $transaction->getAmount();
		$spent = '';
	}else{
		$spent = '\pounds'. $transaction->getAmount();
		$received = '';
	}


	$statement .= $transaction->getTime()->format('Y-m-d H:i:s') . '  & '.$transaction->getDescription().' & '.$spent.' & '.$received.' \\\\';
}


$statement .= '
\hline
\end{tabular}
\end{document}';

$guid = uniqid();

$statementFile = fopen(dirname(__FILE__) . "/statements/{$guid}.tex", "w");
fwrite($statementFile, $statement);
fclose($statementFile);

exec("cd ". dirname(__FILE__) . "/statements; pdflatex {$guid}.tex > test.txt");


