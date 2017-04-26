# HMS fork of middlewares/proxy

ServerAction to create a http proxy using [Guzzle](https://github.com/guzzle/guzzle).

## Requirements

* PHP >= 5.6
* A [PSR-7](https://packagist.org/providers/psr/http-message-implementation) http mesage implementation ([Diactoros](https://github.com/zendframework/zend-diactoros), [Guzzle](https://github.com/guzzle/psr7), [Slim](https://github.com/slimphp/Slim), etc...)

## Example

```php
$target = new Uri('http://api.example.com');
$proxy = new HMS\Proxy($target);
$response = $proxy(new ServerRequest());
```

### Slim Example

```php
// index.php
use HMS\Proxy;
use Zend\Diactoros\Uri;

require 'vendor/autoload.php';

$app = new \Slim\App;
$app->any('/{_:.*}', new Proxy(new Uri('http://httpbin.org')));
$app->run();
```

```sh
# run built-in web server
$ php -S localhost:8000

# open your browser
$ xdg-open http://localhost:8000
```

## Options

#### `__construct(Psr\Http\Message\UriInterface $uri)`

The target of the proxy.

#### `client(GuzzleHttp\ClientInterface $client)`

Instance of the client used to execute the requests. If it's not provided, an instance of `GuzzleHttp\Client` is created automatically.

#### `options(array $options)`

Options passed to the guzzle client. [See the guzzle documentation for more information](http://docs.guzzlephp.org/en/latest/request-options.html)

## Related

* [HTTP Message Strategies PSR (pre-Draft)](https://github.com/http-message-strategies-interop/fig-standards/tree/http-message-strategies/proposed/http-message-strategies)

---

The MIT License (MIT). Please see [LICENSE](LICENSE) for more information.
