<?php
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Query\Expr\Func;

#[ORM\Entity]
#[ORM\Table(name: 'tbusers')]
class User
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\SequenceGenerator(sequenceName:"id", initialValue:0)]
    private int|null $id = null;
    #[ORM\Column(type: 'string')]
    private string $nome;
    #[ORM\Column(type: 'string')]
    private string $email;

    public function setId(string $id) : void{
        $this->id = $id;
    }

    public function getId() : int|null{
        return $this->id;
    }

    public function setNome(string $nome) : void{
        $this->nome = $nome;
    }

    public function getNome() : string{
        return $this->nome;
    }

    public function setEmail(string $email) : void{
        $this->email = $email;
    }

    public function getEmail() : string{
        return $this->email;
    }
}