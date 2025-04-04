<?php

namespace App\Livewire\OpenAi;

use App\Models\Product;
use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

class Generate extends Component
{

    public $id;
    public $object;
    public $message;
    public $loading = false; // Προσθήκη loading state
    public $results;
    protected $rules = [
        'message'             => 'required|string',

    ];
    public function mount($product)
    {
        $this->id = $product;
        $this->object = Product::findOrFail($this->id);
        $this->message = 'θελω να μου δωσεις μια μικρη περιγραφη seo friendly εως 160 χαρακτηρες οχι παραπανω για το '.$this->object->name.' Κωδικός EAN:'.$this->object->ean;
    }
    public function render()
    {
        return view('livewire.open-ai.generate',[

        ]);
    }

    public function save()
    {
        $this->validate();
        $this->loading = true; // Ενεργοποίηση του loading state



        try {
            /**$result = OpenAI::chat()->create([
                'model' => 'gpt-4o',
                'messages' => [
                    ['role' => 'user', 'content' =>$this->message],
                ],
            ]);**/

            $result = OpenAI::chat()->create([
                'model' => 'gpt-4o',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                    ['role' => 'user', 'content' => $this->message],
                ],
                'max_tokens' => 100,
            ]);
            $this->results = trim($result->choices[0]->message->content);

        } catch (\Exception $e) {
            $this->results = "Σφάλμα κατά τη δημιουργία περιγραφής: " . $e->getMessage();
        }

        $this->loading = false; // Απενεργοποίηση του loading state
    }
}
