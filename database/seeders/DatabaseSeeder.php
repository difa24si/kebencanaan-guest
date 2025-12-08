public function run(): void
{
    $this->call([
        CreateKejadianBencanaDummy::class,
        CreatePoskoBencanaDummy::class,
    ]);
}
