<?php

error_reporting(E_ALL ^ E_DEPRECATED);

require __DIR__ . '/../vendor/autoload.php';

$templateDirectory = realpath(__DIR__ . '/../src/AdventureTimeBundle/Resources/views');
$dataDirectory = realpath(__DIR__ . '/../src/AdventureTimeBundle/Resources/config');
$publicDirectory = realpath(__DIR__ . '/../docs');

$twig = new \Twig\Environment(new \Twig\Loader\FilesystemLoader($templateDirectory));
$twig->addGlobal('urlPrefix', '/party-on-tree');

$charactersDirectory = $publicDirectory . '/characters';
if(!is_dir($charactersDirectory)) {
    mkdir($charactersDirectory);
}

$characters = \Symfony\Component\Yaml\Yaml::parse(file_get_contents($dataDirectory . '/characters.yml'))['parameters']['characters'];
foreach ($characters as &$character) {
    $character['slug'] =  strtolower($character['name']);
    file_put_contents(
        $charactersDirectory . '/'.$character['slug'].'.html',
        $twig->render('Personage/personage.html.twig', ['personage' => $character])
    );
}
unset($character);

file_put_contents(
    $publicDirectory . '/index.html',
    $twig->render('Personage/personages.html.twig', ['personages' => $characters])
);

file_put_contents(
    $publicDirectory . '/about.html',
    $twig->render('Information/information.html.twig')
);

$questions = \Symfony\Component\Yaml\Yaml::parse(file_get_contents($dataDirectory . '/questions.yml'))['parameters']['questions'];
foreach($questions as &$question) {
    foreach($question['answer'] as &$answer) {
        $answer['personage'] = array_values(array_map(function(string $name) {
            return strtolower($name);
        }, $answer['personage']));
    }
}
unset($question);
unset($answer);

file_put_contents(
    $publicDirectory . '/test.html',
    $twig->render('Test/test.html.twig', ['questions' => $questions])
);

