# Laravel Queues
## Introduction:
- Laravel queues help you handle time-consuming tasks simultaneously. This means that you can defer tasks like sending emails or processing files to a later time, which improves the performance of your web requests.
- In other words, queues in Laravel allow you to manage and process jobs in the background, enhancing the efficiency of your application.

## Connections vs. Queues
- **Connections:** Define the backend where jobs are stored and processed. Each connection can use a different technology or service, such as Redis, SQS, or a database.
- **Queues:** Within a connection, you can have multiple queues as to serve different functions or purposes in order; as for example "high-priority" queue might process jobs before "low priority queue". You specify which queue a job should be pushed to when dispatching it.

## Jobs:
- Jobs acts as  intermediates between website inferface and the database, it takes orders from user then take it to database and at the same time the user can make other actions untill the database respond and take the results back to user without the need to wait for every action taken.

### creating Jobs:
- Generate a new job class with the Artisan command:

```
php artisan make:job ProcessPodcast
```
This creates a job file in the `app/Jobs` directory. 

- To send or dispatch a job this is done by using `dispatch` method.
```
ProcessPodcast::dispatch($podcast);
```
- Now to make this job work we need to set queue worker to process jobs
by:
```
php artisan queue:work
```
- We can set **Job Middleware** which adds extra behavior to your jobs. Define middleware by implementing the `ShouldQueue` interface and using the `middleware` method in your job class:
```
public function middleware()
{
    return [new WithoutOverlapping];
}
```
#### How to make sure that the all everything is ok or if there any error or the process failed?
- To handle failed jobs, you can check the `failed_jobs` table where Laravel logs jobs that have failed. Use the following Artisan command to view failed jobs:
```
php artisan queue:failed
```
### Monitoring Laravel Queues
- Monitoring queues is essential for ensuring that your background jobs are processed correctly and efficiently. Laravel provides several tools and strategies for monitoring and managing your queues.

- Laravel Horizon is a powerful tool for monitoring and managing Redis queues in Laravel. It provides a beautiful dashboard and an intuitive interface to view the status of your queues and jobs.



***
#### Note to myself:
laravel documentation:
https://laravel.com/docs/11.x/queues
