<?php
require_once '../inc/functions.php';

class DoctrineWorksTest extends PHPUnit_Framework_TestCase
{

	public function testGetEm()
	{
		$em = getEntityManager();
		$this->assertNotNull($em);
		return $em;
	}

	private function createRole()
	{
		$role = new Role();
		$role->setRolename(time());
		$role->setDescription(time());
		return $role;
	}

	private function createUser()
	{
		$user = new Users();
		$user->setFirstname(time());
		$user->setLastname(time());
		$user->setPassword(time());
		$user->setUsername(time());
		return $user;
	}

	private function createBankAccount($user, $accountType)
	{
		$bankAccount = new Bankaccount();
		$bankAccount->setName(time());
		$bankAccount->setBalance(1000);
		$bankAccount->setIdAccounttype($accountType);
		$bankAccount->setIdUser($user);
		return $bankAccount;
	}

	private function createAccountType()
	{
		$accountType = new Accounttype();
		$accountType->setName(time());
		return $accountType;
	}

	public function testCreateNewBankAccount()
	{
		$em = getEntityManager();
		$user = $this->createUser();
		$this->assertNotNull($user);
		$em->persist($user);
		$em->flush();

		$type = $this->createAccountType();
		$this->assertNotNull($type);
		$em->persist($type);
		$em->flush();


		$account = createBankAccount(time(), $type, $user);
		$this->assertNotNull($account);

		$em->remove($account);
		$em->remove($user);
		$em->remove($type);
		$em->flush();
	}

	public function testCreateIssue()
	{

		$em = getEntityManager();

		$user = $this->createUser();
		$this->assertNotNull($user);
		$em->persist($user);
		$em->flush();

		$type = $this->createAccountType();
		$this->assertNotNull($type);
		$em->persist($type);
		$em->flush();

		$account = $this->createBankAccount($user, $type);
		$this->assertNotNull($account);
		$em->persist($account);
		$em->flush();

		$newIssue = createNewIssue($account, time(), time(), $user);
		$this->assertNotNull($newIssue);

		$em->remove($newIssue);
		$em->remove($account);
		$em->remove($user);
		$em->remove($type);
		$em->flush();
	}

	public function testCloseIssue()
	{

		$em = getEntityManager();

		$user = $this->createUser();
		$this->assertNotNull($user);
		$em->persist($user);
		$em->flush();

		$type = $this->createAccountType();
		$this->assertNotNull($type);
		$em->persist($type);
		$em->flush();

		$account = $this->createBankAccount($user, $type);
		$this->assertNotNull($account);
		$em->persist($account);
		$em->flush();

		$newIssue = createNewIssue($account, time(), time(), $user);
		$this->assertNotNull($newIssue);

		closeIssue($newIssue);

		$this->assertEquals(1, $newIssue->isStatus());

		$em->remove($newIssue);
		$em->remove($account);
		$em->remove($user);
		$em->remove($type);
		$em->flush();
	}

	public function testTransferMoney() {
		$reductionValue = 1000;

		$em = getEntityManager();

		$user = $this->createUser();
		$this->assertNotNull($user);
		$em->persist($user);
		$em->flush();

		$type = $this->createAccountType();
		$this->assertNotNull($type);
		$em->persist($type);
		$em->flush();

		$src = $this->createBankAccount($user, $type);
		$this->assertNotNull($src);
		$em->persist($src);
		$em->flush();

		$dst = $this->createBankAccount($user, $type);
		$this->assertNotNull($dst);
		$em->persist($dst);
		$em->flush();

		$dstBefore = $dst->getBalance();
		$srcBefore = $src->getBalance();

		$combinedMoneyBefore = $dstBefore + $srcBefore;

		$transcation = transferMoney($src, $dst, $reductionValue, time());
		$this->assertNotNull($transcation);

		$combinedMoneyAfter = $dst->getBalance() + $src->getBalance();

		$this->assertEquals($combinedMoneyBefore, $combinedMoneyAfter);
		$this->assertEquals($srcBefore - $reductionValue, $src->getBalance());
		$this->assertEquals($dstBefore + $reductionValue, $dst->getBalance());


		$em->remove($transcation);
		$em->remove($src);
		$em->remove($dst);
		$em->remove($user);
		$em->remove($type);
		$em->flush();
}

}
 