### Datastore

The Datastore module provides an easy way to store schema-less app data.

Go to <code>Settings &gt; Datastore</code> and create a table. now you can add any data you want with the datastore api.

Datastore is great to prototype things or create data containers for e.g. comments etc.


## Module API


##### save_entry( $table, $data )

Save or update an entry in a table.

```

// created and modified fields will be auto-added

$comment = [
    'author'  => 'John',
    'email'   => 'john@domain.tld',
    'content' => '...'
];

cockpit('datastore:save_entry', 'comments', $comment);

```

---

##### find( $table, $options = [] )

Query table and get resultset.

```
$comments = cockpit('datastore:find', 'comments', [
    'filter' => ['author' => ['$in'=>['john','henry']]],
    'sort'   => ['created' => -1]
]);

```

---

##### findOne( $table, $options = [] )

Query table and get one item.

```
$comment = cockpit('datastore:findOne', 'comments', [
    'filter' => ['email' => 'test@domain.tld']
]);

```

---

##### remove( $table, $criteria )

Remove an entry in a table by criteria.

```
// remove all fields made by john@domain.tld
cockpit('datastore:remove', 'comments', ['email'=>'john@domain.tld']);

```

---

##### count( $table, $criteria )

Count entries in a table by criteria.

```
// count entries made by john@domain.tld
$count = cockpit('datastore:count', 'comments', ['email'=>'john@domain.tld']);

```
