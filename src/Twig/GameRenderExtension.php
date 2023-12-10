<?php

// src/Twig/AppExtension.php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class GameRenderExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('formatGamePiece', [$this, 'formatGamePiece']),
        ];
    }

    public function formatGamePiece(string $psCode): string
    {
        $lsReturnString = 'game-block ';

        switch ($psCode) {
            case 'trap':
                $lsReturnString .= 'game-trap ';
                break;
            case 'category':
                $lsReturnString .= 'game-category ';
                break;
            case 'error':
                $lsReturnString .= 'game-error ';
                break;
            case 'mistake-on':
                $lsReturnString .= 'game-mistake ';
                break;
            case 'mistake-off':
                $lsReturnString .= 'game-answer border-mistake ';
                break;
            case 'correct':
                $lsReturnString .= 'game-correct ';
                break;
            case 'active':
                $lsReturnString .= 'game-selected ';
                break;
            case 'cash':
                $lsReturnString .= 'game-cash ';
                break;
            default:
                $lsReturnString .= 'game-answer';
        }

        return $lsReturnString;
    }
}
