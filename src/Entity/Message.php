<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use App\Constant\MessageGroups;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\MessageRepository;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
#[ORM\Table(name: 'messages')]
class Message
{
    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    #[Groups([
        MessageGroups::INDEX,
    ])]
    private ?int $id;

    #[ORM\Column(type: Types::STRING, length: 30)]
    #[Constraints\Type(type: Types::STRING)]
    #[Constraints\Length(min: 1, max: 30)]
    #[Constraints\NotBlank(allowNull: false, groups: [MessageGroups::CREATE])]
    #[Groups([
        MessageGroups::INDEX,
        MessageGroups::CREATE,
    ])]
    private string $title;

    #[ORM\Column(type: Types::TEXT)]
    #[Constraints\Type(type: Types::STRING)]
    #[Constraints\Length(min: 1)]
    #[Constraints\NotBlank(allowNull: false, groups: [MessageGroups::CREATE])]
    #[Groups([
        MessageGroups::INDEX,
        MessageGroups::CREATE,
    ])]
    private string $content;

    #[ORM\Column(name: "created_at", type: Types::DATETIME_IMMUTABLE)]
    #[Constraints\Type(type: Types::DATETIME_IMMUTABLE)]
    #[Constraints\NotBlank(allowNull: false, groups: [MessageGroups::CREATE])]
    #[Groups([
        MessageGroups::CREATE,
        MessageGroups::INDEX,
    ])]
    private \DateTimeImmutable $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }
}