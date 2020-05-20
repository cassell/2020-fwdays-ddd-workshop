<?php
declare(strict_types=1);

namespace Beeriously\Domain\Recipe;

use Beeriously\Domain\Generic\ValueObject\Identifier;

class RecipeNameWasChanged extends RecipeEvent
{
    private RecipeName $oldName;
    private RecipeName $newName;
    private \DateTimeImmutable $occurredOn;
    private RecipeId $recipeId;
    private Identifier $eventId;

    public function __construct(RecipeId $recipeId, RecipeName $oldName, RecipeName $newName, \DateTimeImmutable $occurredOn)
    {
        $this->eventId = Identifier::newId(); // for storage
        $this->recipeId = $recipeId;
        $this->oldName = $oldName;
        $this->newName = $newName;
        $this->occurredOn = $occurredOn;
    }

    public function getOldName(): RecipeName
    {
        return $this->oldName;
    }

    public function getNewName(): RecipeName
    {
        return $this->newName;
    }

    public function getOccurredOn(): \DateTimeImmutable
    {
        return $this->occurredOn;
    }

    public function getRecipeId(): RecipeId
    {
        return $this->recipeId;
    }


}