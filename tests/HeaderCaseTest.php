<?php

declare(strict_types=1);

use ChangeCase\HeaderCase;
use PHPUnit\Framework\TestCase;

final class HeaderCaseTest extends TestCase
{
    /**
     * @param string $before
     * @param string $after
     * @dataProvider nonAlphanumericSeparatorsProvider
     * @dataProvider pascalCaseProvider
     * @dataProvider sentenceCaseProvider
     * @dataProvider singleWordProvider
     */
    public function testConvert(string $before, string $after): void
    {
        $this->assertEquals($after, HeaderCase::convert($before));
    }

    public function nonAlphanumericSeparatorsProvider(): array
    {
        return [
            ['dot.case', 'Dot-Case'],
            ['path/case', 'Path-Case'],
        ];
    }

    public function pascalCaseProvider(): array
    {
        return [['TestString', 'Test-String']];
    }

    public function sentenceCaseProvider(): array
    {
        return [
            ['test string', 'Test-String'],
            ['Test String', 'Test-String'],
        ];
    }

    public function singleWordProvider(): array
    {
        return [
            ['test', 'Test'],
            ['TEST', 'Test'],
        ];
    }
}
