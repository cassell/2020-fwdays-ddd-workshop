<?php
declare(strict_types=1);

namespace Beeriously\Domain\Recipe;

use Beeriously\Domain\Generic\ValueObject\Identifier;
use Beeriously\Domain\Ingredients\Grains\DegreesLintner;
use Beeriously\Domain\Ingredients\Grains\GrainId;
use Beeriously\Domain\Ingredients\Grains\GrainName;
use Beeriously\Domain\Ingredients\Grains\GrainTypeDescription;
use Beeriously\Domain\Ingredients\Grains\GrainTypeId;
use Beeriously\Domain\Ingredients\Grains\Lovibond;
use Beeriously\Domain\Measurements\Weight\Kilograms;

class GrainWasAddedToRecipe extends RecipeEvent
{
    private RecipeId $recipeId;
    private GrainId $grainId;
    private GrainName $grainName;
    private DegreesLintner $degreesLintner;
    private Lovibond $lovibond;
    private GrainTypeId $grainTypeId;
    private GrainTypeDescription $grainTypeDescription;
    private Kilograms $kilograms;
    private \DateTimeImmutable $occurredOn;
    private Identifier $eventId;

    public function __construct(RecipeId $recipeId,
                                GrainId $grainId,
                                GrainName $grainName,
                                DegreesLintner $degreesLintner,
                                Lovibond $lovibond,
                                GrainTypeId $grainTypeId,
                                GrainTypeDescription $grainTypeDescription,
                                Kilograms $kilograms,
                                \DateTimeImmutable $occurredOn = null)
    {
        $this->eventId = Identifier::newId();
        $this->recipeId = $recipeId;
        $this->grainId = $grainId;
        $this->grainName = $grainName;
        $this->degreesLintner = $degreesLintner;
        $this->lovibond = $lovibond;
        $this->grainTypeId = $grainTypeId;
        $this->grainTypeDescription = $grainTypeDescription;
        $this->kilograms = $kilograms;
        $this->occurredOn = $occurredOn ?? new \DateTimeImmutable();
    }

    public function getRecipeId(): RecipeId
    {
        return $this->recipeId;
    }

    public function getGrainId(): GrainId
    {
        return $this->grainId;
    }

    public function getGrainName(): GrainName
    {
        return $this->grainName;
    }

    public function getDegreesLintner(): DegreesLintner
    {
        return $this->degreesLintner;
    }

    public function getLovibond(): Lovibond
    {
        return $this->lovibond;
    }

    public function getGrainTypeId(): GrainTypeId
    {
        return $this->grainTypeId;
    }

    public function getGrainTypeDescription(): GrainTypeDescription
    {
        return $this->grainTypeDescription;
    }

    public function getKilograms(): Kilograms
    {
        return $this->kilograms;
    }

    public function getOccurredOn(): \DateTimeImmutable
    {
        return $this->occurredOn;
    }

    public function getEventId(): Identifier
    {
        return $this->eventId;
    }



}