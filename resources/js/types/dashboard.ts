export interface Quote {
    text: string;
    author: string;
}

export interface UserCard {
    id: number;
    name: string;
    email: string;
    last_login_at: string | null;
    is_active: boolean;
    quote: Quote;
}
