## What is Facade ?

Facade acts as a static proxy for accessing underlying objects or services, simplifying interaction with complex
subsystems or dependencies.

---

## Why Use it ?

- **Static Access**: Use static calls to access methods on underlying objects.
- **Dependency Management**: Automatically resolves dependencies using the `atekushi/container` library.
- **Simplified API**: Provides a clean and elegant interface for complex subsystems.

---

## Installation

Install the library via Composer:

```bash
  composer require atekushi/facade
```

## Usage

- Create new facade class

Example:

```php
include 'vendor/autoload.php';

use Atekushi\Facade\Facade;

class BaseClass {
    public function test(){
        echo "Test"
    }
}

/**
 * @method static void test()
 *
 * @mixin BaseClass
 */
class A extends Facade
{
    protected static function getClassSubject(): string
    {
        return BaseClass::class;
    }
}

A::test()

```