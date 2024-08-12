namespace App\GraphQL\Queries;

class LabTestQuery {
public function all() {
return [
['name' => 'Chest X-Ray'],
['name' => 'Cervical Vertebrae X-Ray'],
['name' => 'Thoracic Vertebrae X-Ray'],
];
}
}