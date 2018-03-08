<?php

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace PhpCsFixer\Tests\Fixer\StringNotation;

use PhpCsFixer\Tests\Test\AbstractFixerTestCase;

/**
 * @author Alfiana Efendi Sibuea <alfiana@protonmail.ch>
 *
 * @internal
 *
 * @covers \PhpCsFixer\Fixer\StringNotation\RemoveBacktickFixer
 */
final class RemoveBacktickFixerTest extends AbstractFixerTestCase
{
    /**
     * @param string      $expected
     * @param null|string $input
     *
     * @dataProvider provideTestFixCases
     */
    public function testFix($expected, $input = null)
    {
        $this->doTest($expected, $input);
    }

    public function provideTestFixCases()
    {
        return [
            [
                '<?php $a = \'foo baz bar\';',
                '<?php $a = \'foo `baz` bar\';',
            ],
            [
                '<?php $a = "foo baz bar";',
                '<?php $a = "foo `baz` bar";',
            ],
            [
                '<?php $a = \'foo
                    baz
                    bar\';',
                '<?php $a = \'foo
                    `baz`
                    bar\';',
            ],
            [
                '<?php $a = "foo
                    baz
                    bar";',
                '<?php $a = "foo
                    `baz`
                    bar";',
            ],
        ];
    }
}
