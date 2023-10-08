<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use GuzzleHttp\Client;

class AddAuthorCommand extends Command
{
    protected static $defaultName = 'app:add-author';

    protected function configure(): void
    {
        $this
            ->setDescription('Adds a new author to the Candidate testing API')
            ->addArgument('first_name')
            ->addArgument('last_name')
            ->addArgument('birthday')
            ->addArgument('biography')
            ->addArgument('gender')
            ->addArgument('place_of_birth');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $client = new Client();

        $author = [
        ];

        if ($input->getArgument('first_name')) {
            $author['first_name'] = $input->getArgument('first_name');
        }

        if ($input->getArgument('last_name')) {
            $author['last_name'] = $input->getArgument('last_name');
        }

        if ($input->getArgument('birthday')) {
            $author['birthday'] = $input->getArgument('birthday');
        }

        if ($input->getArgument('biography')) {
            $author['biography'] = $input->getArgument('biography');
        }

        if ($input->getArgument('gender')) {
            $author['gender'] = $input->getArgument('gender');
        }

        if ($input->getArgument('place_of_birth')) {
            $author['place_of_birth'] = $input->getArgument('place_of_birth');
        }

        $accessToken = session()->get('session_access_token');
        $headers['Authorization'] = 'Bearer ' . $accessToken;
        $response = $client->post('https://candidate-testing.api.royal-apps.io/api/v2/authors', [
            'json' => $author,
            'headers' => $headers,
        ]);

        if ($response->getStatusCode() === 201) {
            $output->writeln('The author was successfully added.');
        } else {
            $output->writeln('An error occurred while adding the author.');
        }

        return 0;
    }
}
