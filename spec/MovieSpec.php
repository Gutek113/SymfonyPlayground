<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MovieSpec extends ObjectBehavior
{
	public function it_should_be_a_great_movie()
    {
        $this->getRating()->shouldBe(5);
        $this->getTitle()->shouldBeEqualTo("Star Wars");
        $this->getReleaseDate()->shouldReturn(233366400);
    }
}
