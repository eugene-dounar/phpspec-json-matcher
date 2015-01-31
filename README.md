# JSON matcher for [phpspec](https://github.com/phpspec/phpspec)
PhpSpec matcher 'shouldReturnJson'. 

## Usage
```php
class SomeSpec extends ObjectBehavior
{
    it_should_return_json()
    {
        $this->getJson()->shouldReturnJson('
            {
                "items": ['a', 'b', 'c']
            }
        ');
    }
}
```
Run phpspec with ```-v``` flag to see the difference between actual and expected JSON strings


## Installation
Enable the extension in ```phpspec.yml```
```yaml
extensions:
  - EDounar\PhpSpec\JsonMatcher\Extension       
```
