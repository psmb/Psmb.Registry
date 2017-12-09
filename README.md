**Use with caution and only if you absolutely have to!**

This package provides you with a registry service and an Eel helper to get and set values on it.

## Installation

 `composer require psmb/registry`

## Usage

#### Example

```
root = T:Collection {
    @context.blah = ${Registry.set('acc', 0)}
    collection = ${[1,2,3]}
    itemName = 'item'
    itemRenderer = T:Value {
        @context.blah = ${Registry.set('acc', item + Registry.get('acc'))}
        value = ${Registry.get('acc')}
    }
}
```

The following methods are available:

* **set(key, value):** Sets a value by key
* **get(key):** Returns a value by key
* **increment(key):** Increment a value by key
* **decrement(key):** Derement a value by key

A key can consist of a single string or a path, separated with dots which addresses a value in a nested array.