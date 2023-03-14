namespace App\Events\Order;
use Illuminate\Database\Eloquent\Model;

class OrderDeleted
{
    public function __construct()
    {
        //
    }

    public function handle(Model $order)
    {
        // get the related payment records
        $payments = $order->payments;

        // update the status and paid amount of each payment
        foreach ($payments as $payment) {
            $payment->status = 'cancelled';
            $payment->paid_amount -= $order->total_amount;
            $payment->save();
        }
    }
}