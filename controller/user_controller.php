<?php
/**
 * Author: Val Cinbat
 * Date: 4/4/2023
 * File: user_controller.php
 * Description: The User controller
 */

class UserController
{
    private $user_model;  //an object of the UserModel class

    //create an instance of the UserModel class in the default constructor
    public function __construct()
    {
        //create an instance of the UserModel class
        $this->user_model = UserModel::getUserModel();
    }

    //display the registration form.
    public function index()
    {
        $view = new UserIndex();
        $view->display();

    }

    //create a user account by calling the addUser method of a userModel object
    public function register()
    {
        //call the addUser method of the UserModel object
        $result = $this->user_model->add_user();

        //display result
        $view = new Register();
        $view->display($result);
    }

    //display the login form
    public function login()
    {
        $view = new Login();
        $view->display();
    }

    //verify username and password by calling the verifyUser method defined in the model.
    //It then calls the display method defined in a view class and pass true or false.
    public function verify()
    {
        //call the verifyUser method of the UserModel object
        $result = $this->user_model->verify_user();

        //display result
        $view = new Verify();
        $view->display($result);
    }

    //log out a user by calling the logout method defined in the model and then
    //display a confirmation message
    public function logout()
    {
        $this->user_model->logout();

        // Update the session variable to reflect that the user is logged out
        $_SESSION['user_id'] = null;

        // Set $result to false to update the button text to "Login"
        $result = false;

        $view = new Logout();
        $view->display($result);
    }

    //delete a user account by calling the delete_user method of the UserModel class
    public function delete()
    {
        $user_id = $_SESSION['user_id'];
        $this->user_model->delete_user($user_id);
        $this->logout();
    }

    //display an error message
    public function error($message)
    {
        $view = new UserError();
        $view->display($message);
    }
}
