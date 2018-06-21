# PHP-Validator #

This package provides tools to validate values.

# Installation #

`composer require mirkorap/php-validator`

# Constraint #

All values are validated with the usage of constraints. Below some examples of constraints that you can use:

## BlankConstraint ##

Validates that a value is blank.

## NotBlankConstraint ##

Validates that a value is not blank.

## NullConstraint ##

Validates that a value is null.

## NotNullConstraint ##

Validates that a value is not null.

## IsTrueConstraint ##

Validates that a value is true.

## IsFalseConstraint ##

Validates that a value is false.

## TypeConstraint ##

Validates that a value is of a specific data type. You can choose among these types:
1. string
2. int
3. float
4. bool
5. array
6. object

## EmailConstraint ##

Validates that a value is a valid email address.

## LengthConstraint ##

Validates that a given string length is between some minimum and maximum value.

## UrlConstraint ##

Validates that a given value is a valid url.

## RegexConstraint ##

Validates that a given value matches a regular expression.

## IpConstraint ##

Validates that a given value is a valid ip.

## RangeConstraint ##

Validates that a given number is between some minimum and maximum number.

## EqualToConstraint ##

Validates that a given value is equal to another value.

## NotEqualToConstraint ##

Validates that a given value is not equal to another value.

## IdenticalToConstraint ##

Validates that a given value is identical to another value.

## NotIdenticalToConstraint ##

Validates that a given value is not identical to another value.

## LessThanConstraint ##

Validates that a given value is less than to another value.

## LessThanOrEqualConstraint ##

Validates that a given value is less than or equal to another value.

## GreaterThanConstraint ##

Validates that a given value is greater than another value.

## GreaterThanOrEqualConstraint ##

Validates that a given value is grater than or equal to another value.

## DateConstraint ##

Validates that a given value is a valid date.

## DatetimeConstraint ##

Validates that a given value is a valid datetime.

## ChoiceConstraint ##

This constraint is used to ensure that the given value is one of a given set of valid choices.
To validate the value you should provide an array or a Closure. If you set a multiple to `true` the input value is expected to be an array instead of a single, scalar value. The constraint will check that each value of the input array can be found in the array of valid choices.

# Create custom validation form #
All of these constraints implement the interface Constraint. So if you want to create your custom constraint you should implement it.

To validate a form you should create your custom form class that extends the abstract base class `FormValidator`. This class accepts an array of `FieldValidator` to validate. So each field should be an instance of `FieldValidator` and should contains a set of constraints. Here a basic example:

    class ContactFormValidator extends FormValidator
    {

	    private $companyName = null;
	    private $firstName = null;
	    private $lastName = null;
	    private $email = null;
	    private $phone = null;
	    private $message = null;
	
	    /**
	     * @return FieldValidator|null
	     */
	    public function getCompanyName()
	    {
	        return $this->companyName;
	    }
	
	    /**
	     * @param string $companyName
	     */
	    public function setCompanyName($companyName)
	    {
	        $constraints = array(
	            new LengthConstraint(255),
	        );
	
	        $this->companyName = new FieldValidator('companyName', 'Company Name', $companyName, $constraints);
	    }
	
	    /**
	     * @return FieldValidator|null
	     */
	    public function getFirstName()
	    {
	        return $this->firstName;
	    }
	
	    /**
	     * @param string $firstName
	     */
	    public function setFirstName($firstName)
	    {
	        $constraints = array(
	            new NotBlankConstraint(),
	            new LengthConstraint(255),
	        );
	
	        $this->firstName = new FieldValidator('firstName', 'First name', $firstName, $constraints);
	    }
	
	    /**
	     * @return FieldValidator|null
	     */
	    public function getLastName()
	    {
	        return $this->lastName;
	    }
	
	    /**
	     * @param string $lastName
	     */
	    public function setLastName($lastName)
	    {
	        $constraints = array(
	            new NotBlankConstraint(),
	            new LengthConstraint(255),
	        );
	
	        $this->lastName = new FieldValidator('lastName', 'Last name', $lastName, $constraints);
	    }
	
	    /**
	     * @return FieldValidator|null
	     */
	    public function getEmail()
	    {
	        return $this->email;
	    }
	
	    /**
	     * @param string $email
	     */
	    public function setEmail($email)
	    {
	        $constraints = array(
	            new NotBlankConstraint(),
	            new LengthConstraint(255),
	        );
	
	        $this->email = new FieldValidator('email', 'Email', $email, $constraints);
	    }
	
	    /**
	     * @return FieldValidator|null
	     */
	    public function getPhone()
	    {
	        return $this->phone;
	    }
	
	    /**
	     * @param string $phone
	     */
	    public function setPhone($phone)
	    {
	        $constraints = array(
	            new NotBlankConstraint(),
	            new LengthConstraint(100),
	        );
	
	        $this->phone = new FieldValidator('phone', 'Phone', $phone, $constraints);
	    }
	
	    /**
	     * @return FieldValidator|null
	     */
	    public function getMessage()
	    {
	        return $this->message;
	    }
	
	    /**
	     * @param string $message
	     */
	    public function setMessage($message)
	    {
	        $constraints = array(
	            new NotBlankConstraint(),
	            new LengthConstraint(500),
	        );
	
	        $this->message = new FieldValidator('message', 'Message', $message, $constraints);
	    }
	
	    public function buildForm()
	    {
	        $fields = array(
	            $this->getCompanyName(),
	            $this->getFirstName(),
	            $this->getLastName(),
	            $this->getEmail(),
	            $this->getPhone(),
	            $this->getMessage(),
	        );
	
	        $this->setFields($fields);
	    }

    }
