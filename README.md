# Caboodle

Caboodle is an amazing collection util written by the team of Learning Ladders.

It's inspired by Laravel Collection and Lodash, two very popular collection libraries.


## WTF does caboodle even mean?

While looking for a not at all boring name we looked up synonyms for "Collection". We had a few 
great ones to pick from but _caboodle_ definitely won!

**noun**, Informal.
1. the lot, pack, or crowd:
_I have no use for the whole caboodle._


## Why _another_ collection?

We love laravel collection but it has a few shortcomings that have been solved quite nicely in lodash.

For example, imagine you have this array:

```php
$fruits = [
   [ 'name' => 'apple', color => 'green' ],
   [ 'name' => 'banana', color => 'yellow' ],
   [ 'name' => 'orange', color => 'orange' ]
]
```

Now you want to do a very basic map on this array and only return all fruit names.
In laravel collection you would have to do something like:

```php
$names = Collection::make($fruits)->map(function ($row) {
    return $row['name']
});
```

Bit of a ballake isn't it? In Lodash however, this has been drastically simplified.

```javascript
const names = _.map(fruits, 'name');
```

So what we are doing is bringing the best of laravel collection and lodash together so 
you could easily do something like this in PHP:
```php
$names = Collection::make($fruits)->map('name');
```
