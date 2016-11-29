**Use with caution and only if you absolutely have to!**

This package provides you with a registry service and an Eel helper to get and set values on it.

Example:

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