<?php
require_once '../inc/functions.php';

class DoctrineWorksTest extends PHPUnit_Framework_TestCase
{

	/**
	 * Tests you can get the entity manager
	 */
	public function testGetEm()
	{
		$em = getEntityManager();
		$this->assertNotNull($em);
	}

	/**
	 * This creates a random Role Object
	 * @return Role The created role
	 */
	private function createRole()
	{
		$role = new Role();
		$role->setRolename(time());
		$role->setDescription(time());
		return $role;
	}

	/**
	 * This creates a random User object
	 * @return Users The created user
	 */
	private function createUser()
	{
		$user = new Users();
		$user->setFirstname(time());
		$user->setLastname(time());
		$user->setPassword(time());
		$user->setUsername(time());
		return $user;
	}

	/**
	 * This creates a random bank account
	 * @param $user The user associated with the bank account
	 * @param $accountType The type fo account
	 * @return Bankaccount The created bank account object
	 */
	private function createBankAccount($user, $accountType)
	{
		$bankAccount = new Bankaccount();
		$bankAccount->setName(time());
		$bankAccount->setBalance(1000);
		$bankAccount->setIdAccounttype($accountType);
		$bankAccount->setIdUser($user);
		return $bankAccount;
	}

	/**
	 * This creates a random account type object
	 * @return Accounttype The created account type object
	 */
	private function createAccountType()
	{
		$accountType = new Accounttype();
		$accountType->setName(time());
		return $accountType;
	}

	/**
	 * This tests the createBankAccount to ensure it works correctly
	 */
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

	/**
	 * This tests the createIssue function to ensure it works correctly
	 */
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

	/**
	 * This tests the closeIssue function to ensure it works correctly
	 */
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

	/**
	 * This tests the transfer money function to ensure it works correctly
	 */
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
 