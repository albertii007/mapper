"# mapper"

Make code shorter with mapper;

Register:

on Laravel: config/app on providers array add this: Mapper\Map\MapperServiceProvider::class

on Lumen: bootstrap/app.php add this: $app->register(Mapper\Map\MapperServiceProvider::class);

Interface functions: 

    createMap(object $model, array $requests, ?string $hashing, ?string $dontSet): void;
    
    ex: createMap(new User(), $request->all(), 'password', 'role_id');

    updateMap(object $model, array $requests, ?string $hashing, ?string $dontSet): void;
    
    ex: createMap(new User(), $request->all(), 'password', 'role_id|user_id');

    getModelKey(); returns the primary key of user created or updated;
