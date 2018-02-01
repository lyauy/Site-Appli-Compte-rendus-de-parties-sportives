<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use Tests\TestCase;
use App\Comment;


class CommentsApiTest extends TestCase {



	public function setUp(){

		parent::setUp();
		\Illuminate\Support\Facades\Artisan::call('migrate');

	}

	public function testGetComments(){

		$compterendu = factory(\App\Compterendu::class)->create();
		$comment = factory(Comment::class)->create(['commentable_type' => 'Compterendu', 'commentable_id' => $compterendu->id]);
		$comment2 = factory(Comment::class)->create(['commentable_type' => 'Compterendu', 'commentable_id' => $compterendu->id]);
		$comment3 = factory(Comment::class)->create(['commentable_type' => 'Compterendu', 'commentable_id' => $compterendu->id, 'reply' => $comment2->id]);
		$response = $this->call('GET', '/comments', ['type' => 'Compterendu','id' => $compterendu->id]);
		$comments = json_decode($response->getContent());
		$this->assertEquals(200, $response->getStatusCode(), $response->getContent());
		$this->assertEquals(2, count($comments));
		$this->assertSame(0, $comments[0]->reply);
		$this->assertSame($comment2->id,$comments[0]->id);		
		$this->assertSame(1, count($comments[0]->replies));
		$this->assertSame($comment->id,$comments[1]->id);

	}

	public function testFieldsForJson(){

		$compterendu = factory(\App\Compterendu::class)->create();
		$comment = factory(Comment::class)->create(['commentable_type' => 'Compterendu', 'commentable_id' => $compterendu->id]);
		$reply = factory(Comment::class)->create(['commentable_type' => 'Compterendu', 'commentable_id' => $compterendu->id, 'reply'=>$comment->id]);
		$response = $this->call('GET', '/comments', ['type' => 'Compterendu','id' => $compterendu->id]);
		$comments = json_decode($response->getContent());

		$this->assertObjectNotHasAttribute('email',$comments[0]);
		$this->assertObjectNotHasAttribute('ip',$comments[0]);
		$this->assertObjectHasAttribute('email_md5',$comments[0]);
		$this->assertObjectHasAttribute('ip_md5',$comments[0]);
		$this->assertSame(md5($comment->ip),$comments[0]->ip_md5);

		$this->assertObjectNotHasAttribute('email',$comments[0]->replies[0]);
		$this->assertObjectNotHasAttribute('ip',$comments[0]->replies[0]);
	}

	public function testPostComment(){

		$compterendu = factory(\App\Compterendu::class)->create();
		$comment = factory(Comment::class)->make(['commentable_id' => $compterendu->id, 'commentable_type' => 'Compterendu']);
		$response = $this->call('POST','/comments', $comment->getAttributes());
		$reponse_comment = json_decode($response->getContent());
		$this->assertEquals(200, $response->getStatusCode(), $response->getContent());
		$this->assertEquals(1, Comment::count());
		$this->assertEquals(md5(Request::ip()), $reponse_comment->ip_md5);
	}

	public function testPostCommentOnFakeContent(){

		$comment = factory(Comment::class)->make(['commentable_id' => 3, 'commentable_type' => 'Compterendu']);
		$response = $this->call('POST','/comments', $comment->getAttributes());
		$this->assertEquals(422,$response->getStatusCode());
		$this->assertEquals(0,Comment::count());
	}

	public function testPostCommentWithFakeEmail(){

		$compterendu = factory(\App\Compterendu::class)->create();
		$comment = factory(Comment::class)->make(['commentable_id' => $compterendu->id, 'commentable_type' => 'Compterendu', 'email' => 'fake@']);
		$response = $this->call('POST','/comments', $comment->getAttributes());
		$json = json_decode($response->getContent());
		$this->assertEquals(422, $response->getStatusCode(), $response->getContent());
		$this->assertEquals(0, Comment::count());
		$this->assertObjectHasAttribute('email',$json);
	}

	public function testPostCommentWithFalseReply(){

		$compterendu = factory(\App\Compterendu::class)->create();
		$comment = factory(Comment::class)->make(['commentable_id' => $compterendu->id, 'commentable_type' => 'Compterendu', 'reply' => 3]);
		$response = $this->call('POST','/comments', $comment->getAttributes());
		$json = json_decode($response->getContent());
		$this->assertEquals(422, $response->getStatusCode(), $response->getContent());
		$this->assertEquals(0, Comment::count());
		$this->assertObjectHasAttribute('reply',$json);
	}

	public function testPostReplyOnReply(){

		$compterendu = factory(\App\Compterendu::class)->create();
		$comment = factory(Comment::class)->create(['commentable_id' => $compterendu->id, 'commentable_type' => 'Compterendu']);
		$reply = factory(Comment::class)->create(['commentable_id' => $compterendu->id, 'commentable_type' => 'Compterendu', 'reply'=>$comment->id]);
		$reply2 = factory(Comment::class)->make(['commentable_id' => $compterendu->id, 'commentable_type' => 'Compterendu', 'reply'=>$reply->id]);
		$response = $this->call('POST','/comments', $reply2->getAttributes());
		$json = json_decode($response->getContent());
		$this->assertEquals(422, $response->getStatusCode(), $response->getContent());
		$this->assertEquals(2, Comment::count());
		$this->assertObjectHasAttribute('reply',$json);
	}

	public function testDeleteComment(){

		$compterendu = factory(\App\Compterendu::class)->create();
		$ip = Request::ip();
		$comment = factory(Comment::class)->create(['commentable_id' => $compterendu->id, 'commentable_type' => 'Compterendu', 'ip'=>$ip]);
		$response = $this->call('DELETE', '/comments/' . $comment->id);
		$this->assertEquals(200, $response->getStatusCode(), $response->getContent());
		$this->assertEquals(0, Comment::count());
	}

	public function testDeleteCommentWithoutGoodIp(){

		$compterendu = factory(\App\Compterendu::class)->create();
		$comment = factory(Comment::class)->create(['commentable_id' => $compterendu->id, 'commentable_type' => 'Compterendu']);
		$response = $this->call('DELETE', '/comments/' . $comment->id);
		$this->assertEquals(403, $response->getStatusCode(), $response->getContent());
		$this->assertEquals(1, Comment::count());
	}

	public function testCascadingDelete(){

		$compterendu = factory(\App\Compterendu::class)->create();
		$ip = Request::ip();
		$comment = factory(Comment::class)->create(['commentable_id' => $compterendu->id, 'commentable_type' => 'Compterendu', 'ip'=>$ip]);
		$reply = factory(Comment::class)->create(['commentable_id' => $compterendu->id, 'commentable_type' => 'Compterendu', 'reply' => $comment->id]);
		$response = $this->call('DELETE', '/comments/' . $comment->id);
		$this->assertEquals(200, $response->getStatusCode(), $response->getContent());
		$this->assertEquals(0, Comment::count());
	}
	

}