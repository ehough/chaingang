## chaingang

[![Build Status](https://secure.travis-ci.org/ehough/chaingang.png)](http://travis-ci.org/ehough/chaingang)
[![Project Status: Active - The project has reached a stable, usable state and is being actively developed.](http://www.repostatus.org/badges/latest/active.svg)](http://www.repostatus.org/#active)
[![Latest Stable Version](https://poser.pugx.org/ehough/chaingang/v/stable)](https://packagist.org/packages/ehough/chaingang)
[![License](https://poser.pugx.org/ehough/chaingang/license)](https://packagist.org/packages/ehough/chaingang)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ehough/chaingang/badges/quality-score.png?s=95cea2b96fbdbbe74b53f99c2b37bc2ff71efd30)](https://scrutinizer-ci.com/g/ehough/chaingang/)
[![Code Coverage](https://scrutinizer-ci.com/g/ehough/chaingang/badges/coverage.png?s=050cf750326e215430ffb7fea5ebe484b93ab7fa)](https://scrutinizer-ci.com/g/ehough/chaingang/)

[Chain-of-Responsibility/Chain-of-Command pattern](http://en.wikipedia.org/wiki/Chain-of-responsibility_pattern) for PHP 5.2+

### Sample Usage

```php
/*
 * Build some commands.
 */
$command1 = new MyCommand1();   //implements ehough_chaingang_api_Command
$command2 = new MyCommand2();   //implements ehough_chaingang_api_Command

/*
 * Build and assemble the chain.
 */
$chain = new ehough_chaingang_impl_StandardChain();
$chain->addCommand($command1);
$chain->addCommand($command2);

/*
 * Build the execution context.
 */
$context = new ehough_chaingang_impl_StandardContext();
$context->put('foo', 'bar');

/*
 * Execute the chain.
 */
$successfullyHandled = $chain->execute($context);
```
