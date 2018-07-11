<?php
namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Http\Requests\ListRequest;


class ListController extends Controller
{
    /**
     * Return lists.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        try {
            $res = $this->mailChimp->getLists();
        }catch (\Exception $e){
            return response()->json(['status' => 'Error', 'code' => $e->getCode(), 'message' => $e->getMessage()], $e->getCode());
        }
        return response()->json(['status' => 'Success', 'code' => $this->successStatus, 'message' => $res], $this->successStatus);
    }

    /**
     * Store a new list.
     *
     * @param  ListRequest  $listRequest
     * @return \Illuminate\Http\Response
     */

    public function store(ListRequest $listRequest)
    {
        //    return response()->json(['status' => 'Error', 'code' => $this->badRequestStatus, 'message' => $validator->errors()], $this->successStatus);

        try {
            $this->mailChimp->api('POST','/lists', $listRequest->all());
        }catch (\Exception $e) {
            return response()->json(['status' => 'Error', 'code' => $e->getCode(), 'message' => $e->getMessage()], $e->getCode());
        }
        return response()->json(['status' => 'Success', 'code' => $this->successStatus, 'message' => 'The list is successfully added!'], $this->successStatus);
    }


    /**
     * Update the specified list.
     *
     * @param  ListRequest  $listRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(ListRequest $listRequest, $id)
    {
        try {
            $this->mailChimp->api('PATCH','/lists/'.$id, $listRequest->all());
        }catch (\Exception $e) {
            return response()->json(['status' => 'Error', 'code' => $e->getCode(), 'message' => $e->getMessage()], $e->getCode());
        }
        return response()->json(['status' => 'Success', 'code' => $this->successStatus, 'message' => 'The list is successfully updated!'], $this->successStatus);
    }

    /**
     * Remove the specified list.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->mailChimp->api('DELETE','/lists/'.$id);
        } catch (\Exception $e) {
            return response()->json(['status' => 'Error', 'code' => $e->getCode(), 'message' => $e->getMessage()], $e->getCode());
        }
        return response()->json(['status' => 'Success', 'code' => $this->successStatus, 'message' => 'The list is successfully deleted!'], $this->successStatus);
    }
}