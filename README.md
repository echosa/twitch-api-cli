# twitch-api-cli

### Twitch API CLI Client

This is an interactive CLI script that can be used to execute calls to the Twitch API.

To run it, execute `./bin/new-api-cli-test-client.php <client-id> <client-secret>`, passing in your client ID and secret, respectively. The script will interactively walk you through the rest. You'll be prompted for which API endpoint you'd like to call. Then, you'll be prompted for any parameters that are available for that call. After the API call is made, you're presented with the URI of the request followed by the body of the response.

Here's an example of the CLI client in action, getting the game information for Minecraft and then validating an invalid access token.

```bash
$ ./bin/new-api-cli-test-client.php REDACTED_CLIENT_ID REDACTED_CLIENT_SECRET
Twitch API Testing Tool

Which endpoint would you like to call?
0) Quit
1) Validate an Access Token
2) Refresh an Access Token
3) Get Games
4) Get Streams
5) Get Users
6) Get Users Follows
Choice: 3

Get Games
IDs (separated by commas):
Names (separated by commas): Minecraft

games?name=Minecraft

{
    "data": [
        {
            "id": "27471",
            "name": "Minecraft",
            "box_art_url": "https:\/\/static-cdn.jtvnw.net\/ttv-boxart\/Minecraft-{width}x{height}.jpg"
        }
    ]
}

Which endpoint would you like to call?
0) Quit
1) Validate an Access Token
2) Refresh an Access Token
3) Get Games
4) Get Streams
5) Get Users
6) Get Users Follows
Choice: 1

Validate an Access Token
Access token: foobar

/oauth2/validate

{
    "status": 401,
    "message": "invalid access token"
}

Which endpoint would you like to call?
0) Quit
1) Validate an Access Token
2) Refresh an Access Token
3) Get Games
4) Get Streams
5) Get Users
6) Get Users Follows
Choice: 0

Quit
$
```

## Developer Tools

### PHP Coding Standards Fixer

[PHP Coding Standards Fixer](https://cs.sensiolabs.org/) (`php-cs-fixer`) has been added, specifically for the New Twitch API code. A configuration file for it can be found in `.php_cs.dist`. The ruleset is left at default (PSR-2 at this time). The configuration file mostly just limits it's scope to only the New Twitch API code.

You can run the fixer with `vendor/bin/php-cs-fixer fix`. However, the easiest way to run the fixer is with the provided git hook.

### Git pre-commit Hook

In `bin/git/hooks`, you'll find a `pre-commit` hook that you can add to git that will automatically run the `php-cs-fixer` everytime you commit. The result is that, after the commit is made, any changes that fixer has made are left as unstaged changes. You can review them, then add and commit them.

To install the hook, go to `.git/hooks` and `ln -s ../../bin/git/hooks/pre-commit`.

## API Documentation

The New Twitch API docs can be found [here](https://dev.twitch.tv/docs/api/).

## License

TBD
