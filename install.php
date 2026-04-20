<?php

echo "Installing pre-commit hook...\n";

$gitDir = getcwd() . '/.git';
$hookPath = $gitDir . '/hooks/pre-commit';
$source = __DIR__ . '/scripts/pre-commit';

if (!file_exists($gitDir)) {
    echo "⚠️ Not a git repository. Skipping.\n";
    exit;
}

if (!file_exists($source)) {
    echo "❌ Hook script missing.\n";
    exit(1);
}

copy($source, $hookPath);
chmod($hookPath, 0755);

echo "✅ Pre-commit hook installed.\n";