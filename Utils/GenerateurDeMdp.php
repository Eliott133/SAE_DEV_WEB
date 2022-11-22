<?php
function CreatePass($long_pass)
{
$consonnes = "bcdfghjklmnpqrstvwxz";
$voyelles = "aeiouy";
$mdp='';
for ($i=0; $i < $long_pass; $i++)
{
if (($i % 2) == 0)
{
$mdp = $mdp.substr ($voyelles, rand(0,strlen($voyelles)-1), 1);
}
else
{
$mdp = $mdp.substr ($consonnes, rand(0,strlen($consonnes)-1), 1);
}
}

return $mdp;
}
?>