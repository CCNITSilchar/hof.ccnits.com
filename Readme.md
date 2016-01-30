Leaderboard of coding club NIT Silchar is developed to keep track of the performances of the students by calculating 
the ratings based on their scores in both Local and Open contests hosted on Hackerearth by CODING CLUB NITS.

Every participant is given a default rating of 1500 for the first time he/she participates in the registered contest.

After that seed for each participant is calculated using ELO's rating formula by calculating the probability of one contestant getting 
higher position over other in each possible combination .

Probability Calculation Formula : 1/(1+pow(10,(old_rating_of_contestant A - old_rating_of_contestant_B)/400))

For new participants seed is calculated by (1+n/2) where n=NO. Of participants in the contest .

Then after calculating seed for all participants in a given contest , Hackerearth contest ranking is the criteria used by formula to 
update the ratings.

Formula is 

          new_rating=(seed-rank)*K*contest_type/size+old_rating
          
          seed: Seed of the participant calculated before the contest (Expected Rank )
          rank: Rank in the hackerearth leaderboard for the given contest (Current Rank)
          contest_type: it is factor -> 1 for Local NITS CONTEST , 1.5 for OPEN CONTEST
          size= Total participants in the contest.
          old_rating = Rating of the participant before this contest (Default : 1500)
          K= It is increase or decrease factor to show appreciable change in the rating, (Current value : 160)
          
Then after new_ratings of every participant is updated to leaderboard and they will be ranked and their graph will be plotted
accordingly.

NOTE: 1.Ratings will get affected only when participation is there in the current contest , else old rating will be final rating
      
