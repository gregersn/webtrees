<?php

/**
 * webtrees: online genealogy
 * Copyright (C) 2018 webtrees development team
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

use Fisharebest\Webtrees\SurnameTradition\MatrilinealSurnameTradition;
use Fisharebest\Webtrees\SurnameTradition\SurnameTraditionInterface;

/**
 * Test harness for the class PatrilinenalSurnameTradition
 */
class MatrilinealSurnameTraditionTest extends \PHPUnit\Framework\TestCase
{
    /** @var SurnameTraditionInterface */
    private $surname_tradition;

    /**
     * Prepare the environment for these tests
     */
    public function setUp()
    {
        $this->surname_tradition = new MatrilinealSurnameTradition;
    }

    /**
     * Test whether married surnames are used
     *
     * @covers \Fisharebest\Webtrees\SurnameTradition\MatrilinealSurnameTradition
     */
    public function testMarriedSurnames()
    {
        $this->assertSame(false, $this->surname_tradition->hasMarriedNames());
    }

    /**
     * Test whether surnames are used
     *
     * @covers \Fisharebest\Webtrees\SurnameTradition\MatrilinealSurnameTradition
     */
    public function testSurnames()
    {
        $this->assertSame(true, $this->surname_tradition->hasSurnames());
    }

    /**
     * Test new son names
     *
     * @covers \Fisharebest\Webtrees\SurnameTradition\MatrilinealSurnameTradition
     */
    public function testNewSonNames()
    {
        $this->assertSame(
            [
                'NAME' => '/Black/',
                'SURN' => 'Black',
            ],
            $this->surname_tradition->newChildNames('John /White/', 'Mary /Black/', 'M')
        );
    }

    /**
     * Test new daughter names
     *
     * @covers \Fisharebest\Webtrees\SurnameTradition\MatrilinealSurnameTradition
     */
    public function testNewDaughterNames()
    {
        $this->assertSame(
            [
                'NAME' => '/Black/',
                'SURN' => 'Black',
            ],
            $this->surname_tradition->newChildNames('John /White/', 'Mary /Black/', 'F')
        );
    }

    /**
     * Test new child names
     *
     * @covers \Fisharebest\Webtrees\SurnameTradition\MatrilinealSurnameTradition
     */
    public function testNewChildNames()
    {
        $this->assertSame(
            [
                'NAME' => '/Black/',
                'SURN' => 'Black',
            ],
            $this->surname_tradition->newChildNames('John /White/', 'Mary /Black/', 'U')
        );
    }

    /**
     * Test new child names
     *
     * @covers \Fisharebest\Webtrees\SurnameTradition\MatrilinealSurnameTradition
     */
    public function testNewChildNamesWithSpfx()
    {
        $this->assertSame(
            [
                'NAME' => '/van Black/',
                'SPFX' => 'van',
                'SURN' => 'Black',
            ],
            $this->surname_tradition->newChildNames('John /de White/', 'Mary /van Black/', 'U')
        );
    }

    /**
     * Test new child names
     *
     * @covers \Fisharebest\Webtrees\SurnameTradition\MatrilinealSurnameTradition
     */
    public function testNewChildNamesWithNoParentsNames()
    {
        $this->assertSame(
            ['NAME' => '//'],
            $this->surname_tradition->newChildNames('', '', 'U')
        );
    }

    /**
     * Test new father names
     *
     * @covers \Fisharebest\Webtrees\SurnameTradition\MatrilinealSurnameTradition
     */
    public function testNewFatherNames()
    {
        $this->assertSame(
            ['NAME' => '//'],
            $this->surname_tradition->newParentNames('John /White/', 'M')
        );
    }

    /**
     * Test new mother names
     *
     * @covers \Fisharebest\Webtrees\SurnameTradition\MatrilinealSurnameTradition
     */
    public function testNewMotherNames()
    {
        $this->assertSame(
            [
                'NAME' => '/White/',
                'SURN' => 'White',
            ],
            $this->surname_tradition->newParentNames('John /White/', 'F')
        );
    }

    /**
     * Test new parent names
     *
     * @covers \Fisharebest\Webtrees\SurnameTradition\MatrilinealSurnameTradition
     */
    public function testNewParentNames()
    {
        $this->assertSame(
            ['NAME' => '//'],
            $this->surname_tradition->newParentNames('John /White/', 'U')
        );
    }

    /**
     * Test new husband names
     *
     * @covers \Fisharebest\Webtrees\SurnameTradition\MatrilinealSurnameTradition
     */
    public function testNewHusbandNames()
    {
        $this->assertSame(
            ['NAME' => '//'],
            $this->surname_tradition->newSpouseNames('Mary /Black/', 'M')
        );
    }

    /**
     * Test new wife names
     *
     * @covers \Fisharebest\Webtrees\SurnameTradition\MatrilinealSurnameTradition
     */
    public function testNewWifeNames()
    {
        $this->assertSame(
            ['NAME' => '//'],
            $this->surname_tradition->newSpouseNames('John /White/', 'F')
        );
    }

    /**
     * Test new spouse names
     *
     * @covers \Fisharebest\Webtrees\SurnameTradition\MatrilinealSurnameTradition
     */
    public function testNewSpouseNames()
    {
        $this->assertSame(
            ['NAME' => '//'],
            $this->surname_tradition->newSpouseNames('Chris /Green/', 'U')
        );
    }
}
