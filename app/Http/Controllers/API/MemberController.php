<?php
namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;


class MemberController extends Controller
{
    /**
     * Store a new member in specified list.
     *
     * @param  MemberRequest $memberRequest
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function store(MemberRequest $memberRequest, $id)
    {
        try{
            $this->mailChimp->subscribe($id, $memberRequest->email, $merge = ['FNAME' => $memberRequest->fname, 'LNAME' => $memberRequest->lname], $confirm = false);
        }catch (\Exception $e){
            return response()->json(['status' => 'Error', 'code' => $e->getCode(), 'message' => $e->getMessage()], $e->getCode());
        }
        return response()->json(['status' => 'Success', 'code' => $this->successStatus, 'message' => 'New member successfully added!'], $this->successStatus);

    }

    /**
     * Update member in specified list.
     *
     * @param  MemberRequest $memberRequest
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function update(MemberRequest $memberRequest, $id)
    {
        try{
            $this->mailChimp->subscribe($id, $memberRequest->email, $merge = ['FNAME' => $memberRequest->fname, 'LNAME' => $memberRequest->lname], $confirm = false);
        }catch (\Exception $e){
            return response()->json(['status' => 'Error', 'code' => $e->getCode(), 'message' => $e->getMessage()], $e->getCode());
        }
        return response()->json(['status' => 'Success', 'code' => $this->successStatus, 'message' => 'Member successfully updated!'], $this->successStatus);

    }

    /**
     * Delete the member from specified list.
     *
     * @param  MemberRequest $memberRequest
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(MemberRequest $memberRequest, $id)
    {
        $emailHash = md5(strtolower($memberRequest->email));
        try{
            $this->mailChimp->api('DELETE','/lists/'.$id.'/members/'.$emailHash);
        }catch (\Exception $e){
            return response()->json(['status' => 'Error', 'code' => $e->getCode(), 'message' => $e->getMessage()],$e->getCode());
        }
        return response()->json(['status' => 'Success', 'code' => $this->successStatus, 'message' => 'The member successfully deleted!'], $this->successStatus);
    }


}