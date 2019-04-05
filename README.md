[![Build Status](https://travis-ci.org/daison12006013/collab.svg?branch=master)](https://travis-ci.org/daison12006013/collab)

---

# Collab

This package easily provide a way to execute a callable functions/invoke/method or static method.

## Examples

Using `Collab` to handle callables.

```php
Collab::make()->setArgs($var1, $var2)->handle(function ($var1, $var2) {
   // ...
});
Collab::make()->setArgs($var1, $var2)->handle(new UserQuery()); // will call __invoke of the class
Collab::make()->setArgs($var1, $var2)->handle('UserQuery@method');
Collab::make()->setArgs($var1, $var2)->handle('UserQuery::staticMethod');
```

## Common Use Cases

We mostly use this when we have common process, callables are lambda's approach where we use them repetitively yet it does less effort of code.
