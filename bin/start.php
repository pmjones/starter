<?php
if ($argc < 2) {
    echo <<<HELP

    DESCRIPTION:
        Start a new package project.

    USAGE:
        php bin/start.php <vendor> <package> <namespace>

    EXAMPLE:
        php bin/start.php myvendor mypackage MyNamespace


    HELP;
    exit(1);
}

$vendor = $argv[1] ?? null;

if (! $vendor) {
    echo "Please pass a 'vendor' as the first argument." . PHP_EOL;
    exit(1);
}

$package = $argv[2] ?? null;

if (! $package) {
    echo "Please pass a 'package' as the second argument." . PHP_EOL;
    exit(1);
}

$namespace = $argv[3] ?? null;

if (! $namespace) {
    echo "Please pass a 'namespace' as the second argument." . PHP_EOL;
    exit(1);
}

$dir = dirname(__DIR__);
$files = [
    "{$dir}/.github/workflows/ci.yml",
    "{$dir}/composer.json",
    "{$dir}/phpunit.xml",
];

foreach ($files as $file) {
    $file = str_replace('/', DIRECTORY_SEPARATOR, $file);
    $text = file_get_contents($file);
    $text = strtr(
        $text,
        [
            '{VENDOR}' => $vendor,
            '{PACKAGE}' => $package,
            '{NAMESPACE}' => $namespace
        ],
    );
    file_put_contents($file, $text);
}

file_put_contents("{$dir}/README.md", <<<README
# {$vendor}/{$package}

The {$vendor}/{$package} project.

README);

`git init .`;
`git add .`;
`git branch -m 0.x`;
`git commit -a --message="started {$vendor}/{$package} project"`;
