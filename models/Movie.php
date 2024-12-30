<?php

class Movie {
    public $id;
    public $title;
    public $year_release;
    public $description;
    public $user_id;
    public $rating_analysis;
    public $count_analysis;
    public $image;

    public function query($where, $params)
    {
        $database = new Database(config('database'));

        return $database->query("
        select 
            m.id, m.title, m.description, m.year_release, m.image, 
            round(coalesce(sum(r.rating), 0) / 5.0) as rating_analysis, 
            count(r.id) as count_analysis
        from movies m
        left join ratings r on r.movie_id = m.id
        where $where
        group by m.id, m.title, m.description, m.year_release, m.image", 
        self::class, $params);
    }

    public static function get($id): ?array 
    {
        return (new self)->query('m.id = :id', ['id' => $id])->fetch();
    }

    public static function all($filter = ''): ?array
    {
        return (new self)->query(
            'title like :filter', ['filter' => "%$filter%"]
         )->fetchAll();
    }

    public static function my($user_id): ?array
    {
        return (new self)->query(
            'm.user_id = :user_id', 
            ['user_id' => $user_id])->fetchAll();
    }

}
