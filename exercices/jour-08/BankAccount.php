<pre>
<?php
class BankAccount
{
    private float $balance;

    public function __construct(
        float $urBalance
    ) {
        $this->setBalance($urBalance);
    }

    public function setBalance(float $urBalance)
    {
        if ($urBalance < 0) {
            throw new InvalidArgumentException('Votre balance doit-être positive');
        } else {
            $this->balance = $urBalance;
        }
    }

    public function deposit($amount)
    {
        $this->balance = $this->balance + $amount;
    }

    public function withdraw($amount)
    {
        $balanceAfterWithdraw = $this->balance - $amount;
        if ($balanceAfterWithdraw < 0) {
            echo 'Votre solde est insuffisant, il vous manque '.-$balanceAfterWithdraw.' €';
        } elseif ($balanceAfterWithdraw === 0.00) {
            $this->balance = $balanceAfterWithdraw;
            echo 'Retrait accepté, attention il vous reste '.$balanceAfterWithdraw.' €';
        } else {
            $this->balance = $balanceAfterWithdraw;
        }
    }

    public function getBalance()
    {
        echo $this->balance.' €';
    }
}

$MyMoney = new BankAccount(10);
$MyMoney->getBalance();
echo '<br>';
$MyMoney->withdraw(12);
echo '<br>';
$MyMoney->deposit(2);
echo '<br>';
$MyMoney->withdraw(12);
echo '<br>';
$MyMoney->getBalance();

?>
</pre>