<?php


$testuserRepo = new userRepository($pdo);
// $testuserRepo->save(2, "Lilo", "lilo.chauvzdadzad@test.com", "Jedmao?d0298NDJH", "admin");
echo "<pre>";
print_r($testuserRepo->findByEmail("lilo.chauvzdadzad@test.com"));
echo "</pre>";
?>