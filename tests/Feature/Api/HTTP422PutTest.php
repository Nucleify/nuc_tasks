<?php

if (!defined('PEST_RUNNING')) {
    return;
}

uses()->group('task-api-422');
uses()->group('task-api-422-put');
uses()->group('api-422');
uses()->group('api-422-put');

beforeEach(function (): void {
    $this->createUsers();
    $this->actingAs($this->admin);
});

describe('422 > PUT', function (): void {
    apiTestArray([
        // USER_ID
        'user_id > empty' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['user_id' => '']),
            'structure' => ['errors' => ['user_id']],
            'fragment' => ['errors' => ['user_id' => ['The user id field is required.']]],
        ],
        'user_id > string' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['user_id' => 'user_id']),
            'structure' => ['errors' => ['user_id']],
            'fragment' => ['errors' => ['user_id' => ['The user id field must be an integer.']]],
        ],
        'user_id > false' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['user_id' => false]),
            'structure' => ['errors' => ['user_id']],
            'fragment' => ['errors' => ['user_id' => ['The user id field must be an integer.']]],
        ],
        'user_id > empty array' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['user_id' => []]),
            'structure' => ['errors' => ['user_id']],
            'fragment' => ['errors' => ['user_id' => ['The user id field is required.']]],
        ],

        // ASSIGNEE_ID
        'assignee_id > string' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['assignee_id' => 'user_id']),
            'structure' => ['errors' => ['assignee_id']],
            'fragment' => ['errors' => ['assignee_id' => ['The assignee id field must be an integer.']]],
        ],
        'assignee_id > false' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['assignee_id' => false]),
            'structure' => ['errors' => ['assignee_id']],
            'fragment' => ['errors' => ['assignee_id' => ['The assignee id field must be an integer.']]],
        ],
        'assignee_id > empty array' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['assignee_id' => []]),
            'structure' => ['errors' => ['assignee_id']],
            'fragment' => ['errors' => ['assignee_id' => ['The assignee id field must be an integer.']]],
        ],

        // COLLABORATOR_IDS
        'collaborator_ids > integer' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['collaborator_ids' => 1]),
            'structure' => ['errors' => ['collaborator_ids']],
            'fragment' => ['errors' => ['collaborator_ids' => ['The collaborator ids field must be a string.']]],
        ],
        'collaborator_ids > false' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['collaborator_ids' => false]),
            'structure' => ['errors' => ['collaborator_ids']],
            'fragment' => ['errors' => ['collaborator_ids' => ['The collaborator ids field must be a string.']]],
        ],
        'collaborator_ids > true' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['collaborator_ids' => true]),
            'structure' => ['errors' => ['collaborator_ids']],
            'fragment' => ['errors' => ['collaborator_ids' => ['The collaborator ids field must be a string.']]],
        ],
        'collaborator_ids > empty array' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['collaborator_ids' => []]),
            'structure' => ['errors' => ['collaborator_ids']],
            'fragment' => ['errors' => ['collaborator_ids' => ['The collaborator ids field must be a string.']]],
        ],

        // TITLE
        'title > empty' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['title' => '']),
            'structure' => ['errors' => ['title']],
            'fragment' => ['errors' => ['title' => ['The title field is required.']]],
        ],
        'title > integer' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['title' => 1]),
            'structure' => ['errors' => ['title']],
            'fragment' => ['errors' => ['title' => ['The title field must be a string.']]],
        ],
        'title > false' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['title' => false]),
            'structure' => ['errors' => ['title']],
            'fragment' => ['errors' => ['title' => ['The title field must be a string.']]],
        ],
        'title > true' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['title' => true]),
            'structure' => ['errors' => ['title']],
            'fragment' => ['errors' => ['title' => ['The title field must be a string.']]],
        ],
        'title > empty array' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['title' => []]),
            'structure' => ['errors' => ['title']],
            'fragment' => ['errors' => ['title' => ['The title field is required.']]],
        ],

        // DESCRIPTION
        'description > integer' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['description' => 1]),
            'structure' => ['errors' => ['description']],
            'fragment' => ['errors' => ['description' => ['The description field must be a string.']]],
        ],
        'description > false' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['description' => false]),
            'structure' => ['errors' => ['description']],
            'fragment' => ['errors' => ['description' => ['The description field must be a string.']]],
        ],
        'description > true' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['description' => true]),
            'structure' => ['errors' => ['description']],
            'fragment' => ['errors' => ['description' => ['The description field must be a string.']]],
        ],
        'description > empty array' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['description' => []]),
            'structure' => ['errors' => ['description']],
            'fragment' => ['errors' => ['description' => ['The description field must be a string.']]],
        ],

        // START_DATE
        'start_date > empty' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['start_date' => '']),
            'structure' => ['errors' => ['start_date']],
            'fragment' => ['errors' => ['start_date' => ['The start date field is required.']]],
        ],
        'start_date > integer' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['start_date' => 1]),
            'structure' => ['errors' => ['start_date']],
            'fragment' => ['errors' => ['start_date' => ['The start date field must be a string.', 'The start date field must match the format Y-m-d.']]],
        ],
        'start_date > false' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['start_date' => false]),
            'structure' => ['errors' => ['start_date']],
            'fragment' => ['errors' => ['start_date' => ['The start date field must be a string.', 'The start date field must match the format Y-m-d.']]],
        ],
        'start_date > true' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['start_date' => true]),
            'structure' => ['errors' => ['start_date']],
            'fragment' => ['errors' => ['start_date' => ['The start date field must be a string.', 'The start date field must match the format Y-m-d.']]],
        ],

        // END_DATE
        'end_date > integer' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['end_date' => 1]),
            'structure' => ['errors' => ['end_date']],
            'fragment' => ['errors' => ['end_date' => ['The end date field must be a date after or equal to start date.', 'The end date field must be a string.', 'The end date field must match the format Y-m-d.']]],
        ],
        'end_date > false' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['end_date' => false]),
            'structure' => ['errors' => ['end_date']],
            'fragment' => ['errors' => ['end_date' => ['The end date field must be a date after or equal to start date.', 'The end date field must be a string.', 'The end date field must match the format Y-m-d.']]],
        ],
        'end_date > true' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['end_date' => true]),
            'structure' => ['errors' => ['end_date']],
            'fragment' => ['errors' => ['end_date' => ['The end date field must be a date after or equal to start date.', 'The end date field must be a string.', 'The end date field must match the format Y-m-d.']]],
        ],
        'end_date > empty array' => [
            'method' => 'PUT',
            'route' => 'tasks.update',
            'status' => 422,
            'id' => 1,
            'data' => array_merge(updatedTaskData, ['end_date' => []]),
            'structure' => ['errors' => ['end_date']],
            'fragment' => ['errors' => ['end_date' => ['The end date field must be a date after or equal to start date.', 'The end date field must be a string.', 'The end date field must match the format Y-m-d.']]],
        ],
    ]);
});
