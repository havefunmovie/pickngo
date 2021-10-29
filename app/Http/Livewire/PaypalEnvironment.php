<?php


namespace App\Http\Livewire;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\JsonResponse;
use PayPal\Checkout\Environment\SandboxEnvironment;
use PayPal\Checkout\Http\OrderCaptureRequest;
use PayPal\Checkout\Http\OrderCreateRequest;
use PayPal\Checkout\Http\PayPalClient;
use PayPal\Checkout\Orders\ApplicationContext;
use PayPal\Checkout\Orders\Item;
use PayPal\Checkout\Orders\Order;
use PayPal\Checkout\Orders\PurchaseUnit;

class PaypalEnvironment
{
    private $clientId = "ARFGbhnIa8KxcRiPD5VqsAip52D7xzAb_vPHn7-r25NaW99L5GRahsD_cYfCI-GwmhpqLM3Xlv711-7w";
    private $clientSecret = "EMSPQxE0ssVAK4zzSh_Orlk_wgNwqktkbHCGReH0EXT7rDWBAnvc9DJ4BP2lbCNElsa-xHTXU8V0Q9Ev";

    public function getClient()
    {
        $environment = new SandboxEnvironment($this->clientId, $this->clientSecret);
//        $environment = new ProductionEnvironment($this->clientId, $this->clientSecret);

        $client = new PayPalClient($environment);
        return $client;
    }

    public function createNewOrder($currency, $price, $route) {
        $purchaseUnit = new PurchaseUnit($currency, $price);

        $applicationContext = new ApplicationContext('Paypal Inc', 'en');
        $applicationContext->setUserAction('PAY_NOW');
        $applicationContext->setReturnUrl(route($route));
        $applicationContext->setCancelUrl(route($route));

        $item = new Item('Item 1', $currency, $price, 1);
        $purchaseUnit->addItem($item);
        $order = new Order('CAPTURE');
        $order->addPurchaseUnit($purchaseUnit);
        $order->setApplicationContext($applicationContext);

        $request = new OrderCreateRequest($order);
        $response = $this->getClient()->send($request);
        $result = json_decode((string) $response->getBody());
        return $result;
    }

    public function getOrderStatus($id) {
        try {
            $response = $this->getClient()->send(new OrderCaptureRequest($id));
            $result = json_decode((string) $response->getBody());
        } catch (ClientException $e) {
            $response = $e->getResponse();
            $result = $response->getBody()->getContents();
        }
        return $result;
    }

    protected function setUp($id)
    {
        $response2 = json_encode([
            'id' => $id,
            'intent' => 'CAPTURE',
            'status' => 'CREATED',
        ]);
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], $response2)
        ]);
        $handlerStack = HandlerStack::create($mock);
//        $httpClient = new Client(['handler' => $handlerStack]);
        return new Client(['handler' => $handlerStack]);
    }
}