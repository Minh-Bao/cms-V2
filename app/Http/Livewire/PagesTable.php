<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Site\Websitepage;
use App\Repositories\WebsitepageRepositoryInterface;
use Livewire\WithPagination;

class PagesTable extends Component
{
    use WithPagination;

    public string  $search = "";
    public string  $orderField = "created_at";
    public string  $orderDirection = 'ASC';
    public  array $selection = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'orderField' => ['except' => 'name'],
        'orderDirection' => ['except' => 'ASC']

    ];

    public function updating($name, $value) {
        if ($name == 'search') {
            $this->resetPage();
        }
    }

    public function deletePages(array $ids){
        Websitepage::destroy($ids);
        $this->selection = [];
    }

    public function setOrderField(string $name) 
    {
        if($name == $this->orderField){
            $this->orderDirection = $this->orderDirection =='ASC' ? 'DESC' : 'ASC';
        }else{
            $this->orderField = $name;
            $this->reset('orderDirection');
        }
    }

    public function render(WebsitepageRepositoryInterface $pages)
    {
        return view('livewire.pages-table', [

            'websitepages' =>  $pages->allOrderedBy($this->orderField, $this->orderDirection)->where('title', 'LIKE', "%{$this->search}%")->simplePaginate(10)


        ]);
    }
}
