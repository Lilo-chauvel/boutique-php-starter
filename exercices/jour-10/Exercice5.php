<?php


$testUserRepo = new UserRepository($pdo);
// $testUserRepo->save(2, "Lilo", "lilo.chauvzdadzad@test.com", "Jedmao?d0298NDJH", "admin");
echo "<pre>";
print_r($testUserRepo->findByEmail("lilo.chauvzdadzad@test.com"));
echo "</pre>";
?>