<?php

class CustomerController extends BaseController {

    /**
     * Responsible for customer registration
     * @return mixed
     */
	public function register()
	{
        if ($this->existingCustomer()) {
            $errorMsg = 'There\'s an existing customer with chosen username/email. Please choose different credentials';
            return View::make('register')->with('error', $errorMsg);
        } else {
            $this->createCustomer();
            $successMsg = 'Registration successful!';
            return View::make('register')->with('success', $successMsg);
        }
	}

    /**
     * Checks if there is an existing customer with the input email/username
     */
    protected function existingCustomer()
    {
        $email = Input::get('email');
        $username = Input::get('username');
        $existingCustomer = Customer::where('username', '=', $username)
                                    ->orWhere('email', '=', $email)
                                    ->count();

        return (bool) $existingCustomer;
    }

    /**
     * Creates a customer record
     * @return Customer
     */
    protected function createCustomer()
    {
        $customer = new Customer();
        $customer->first_name = Input::get('first_name');
        $customer->last_name = Input::get('last_name');
        $customer->email = Input::get('email');
        $customer->username = Input::get('username');
        $customer->password = Hash::make(Input::get('password'));
        $customer->save();

        return $customer;
    }

    /**
     * Adds a pizza order entry for logged in customer
     * @return mixed
     */
    public function addPizzaOrder()
    {
        $pizzaOrder = new Pizza();
        $pizzaOrder->onions = (bool) Input::get('topping_onion');
        $pizzaOrder->mushrooms = (bool) Input::get('topping_mushroom');
        $pizzaOrder->capsicum = (bool) Input::get('topping_capsicum');
        $pizzaOrder->customer_id = Auth::user()->id;
        $pizzaOrder->save();

        $customerOrders = $this->getCustomerOrders();

        $successMsg = 'Order successfully placed!';
        return View::make('order', array('success' => $successMsg, 'orders' => $customerOrders));
    }

    /**
     * Returns all the orders placed by logged in customer
     */
    protected function getCustomerOrders()
    {
        return Pizza::where('customer_id', '=', Auth::user()->id)->get();
    }
}
