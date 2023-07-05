<?php 

class A 
{
    public function test1()
    {
        return 'test1';
    }
}

class B extends A
{
    public function test2()
    {
        return 'test2';
    }
}

class C extends B
{
    public function test3()
    {
        return 'test3';
    }
}
/* 
Non reflexif : Une classe ne peut pas hériter d'elle-même. Exemple : class A extends A

Non symétrique : Si A hérite de B, alors B ne peut pas hériter de A. Exemple : class A extends B et class B extends A

Pas de multi-héritage : C'est à dire qu'une classe ne peut pas hériter de plusieurs classes en même temps. Exemple : class A extends B, C

*/