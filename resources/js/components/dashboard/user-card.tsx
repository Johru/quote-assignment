import type { UserCard as UserCardType } from '@/types/dashboard';

interface Props {
    user: UserCardType;
}

export default function UserCard({ user }: Props) {
    return (
        <div className="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
            <div className="relative grid gap-2 p-4 text-sm">
                <h2 className="text-2xl">{user.name}</h2>

                <p className="text-lg text-gray-500 italic">{user.email}</p>

                <p className="flex justify-between gap-2">
                    <span>Poslední přihlášení:</span>
                    <span>{user.last_login_at ?? 'Nikdy'}</span>
                </p>

                <p className="flex justify-between gap-2">
                    <span>Aktivní:</span>
                    <span
                        className={`rounded px-2 py-0.5 text-xs font-medium ${
                            user.is_active
                                ? 'bg-green-100 text-green-700'
                                : 'bg-red-100 text-red-700'
                        }`}
                    >
                        {user.is_active ? 'ANO' : 'NE'}
                    </span>
                </p>

                <p className="grid gap-2 border-t pt-4">
                    <span className="italic">"{user.quote.text}"</span>
                    <span className="justify-self-end">
                        — {user.quote.author}
                    </span>
                </p>
            </div>
        </div>
    );
}
