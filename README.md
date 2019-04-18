
composer require 2lenet/help-bundle

# HelpBundle

This bundle provides help icons that display a custom message within a tooltip with 2 simple
twig function. Icons can be hidden with an icon acting like a button.

## Assets
```html
<link rel="stylesheet" type="text/css" href="{{ asset('bundles/llehelp/css/style.css') }}" />
<script src="{{ asset('bundles/llehelp/js/help.js') }}"></script>
```

## Twig functions

Add an icon (act like a button) that display/hide all the help icons.
```twig
lle_help_show()
```

Add an help icon, the code identify an Help entity that contains a message.
 If there are no entity associated with the code an exception will be throw. 
```twig
lle_help("your_code") 
```

## Help entity

The Help entity is used to store message, the key is the code and the message is the value.

```php
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $message;

    /**
     * @ORM\Column(type="string", length=40, nullable=false)
     */
    private $code;
   ```
