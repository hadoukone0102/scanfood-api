<?php 

use Illuminate\Http\Resources\Json\JsonResource;

class PermsResouce extends JsonResource{

    public function toArray(Illuminate\Http\Request $request):array{
        return [
            "id" => $this->id,
            "code" => $this->code,
            "desc" => $this-> desc,
            "created_at" => $this-> created_at
        ];
    }
}