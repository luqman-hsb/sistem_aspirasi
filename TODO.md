# TODO: Pengembangan Aplikasi Pengaduan Sarana Sekolah

## Progress Tracking

- [x] 1. Create TODO.md with plan steps
- [x] 2. Run database migrations (`php artisan migrate`)
- [x] 3. Create seeders for Kategori and Siswa, run `php artisan db:seed`
- [x] 4. Create migration to add `id_aspirasi` FK column to `input_aspirasi` table
- [x] 5. Create Eloquent Models: Siswa, Kategori, InputAspirasi, Aspirasi with relationships
- [x] 6. Implement role-based authentication (separate login siswa/admin)
- [x] 7. Create AspirasiController (siswa: create form, store, history)
- [x] 8. Create AdminController (list with filters, update status/feedback)
- [x] 9. Create Blade views: layout/app.blade.php, login.blade.php, aspirasi/form.blade.php, aspirasi/history.blade.php, admin/dashboard.blade.php, admin/edit.blade.php (basic HTML tables/forms)
- [x] 10. Add routes to routes/web.php
- [ ] 11. Test functionality: migrate:fresh --seed, serve, submit aspirasi as siswa, update as admin
- [ ] 12. Final cleanup and attempt_completion
