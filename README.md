# ResellerClube Domain Registration Php Api

```
$resellerclub = new neoistone\Resellerclub\domainapi('user_id', 'api_key','response type json or xml  (option param Defualt json)','live=true or test=false (option param Defualt true)');
```

```
$resellerclub->command('command name ','parameters in array');
```

```
// print response
echo $resellerclub->run();
```

## Examples ##
### Live API ###
```
$resellerclub = new neoistone\Resellerclub\domainapi('user_id','api_key','json');
$resellerclub->command('available',array(
  	'domain' => 'domain',
  	'tlds' => 'com',
));
echo $resellerclub->run();
```


[More infromtion click here](https://freeaccount.myorderbox.com/kb/answer/750)

[About Neoistone](https://www.neoistone.com) | [Neoistone Hosting](https://www.neoistone.com/hosting)
